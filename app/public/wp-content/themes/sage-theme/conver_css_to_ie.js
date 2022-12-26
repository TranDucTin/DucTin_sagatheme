const postcss = require('postcss')
const cssvariables = require('postcss-css-variables')
const config = require('./resources/assets/build/config.js')

const fs = require('fs')
const pathCSS = config.paths.dist + '/styles';
const start = async () => {
  fs.readdir(pathCSS, (err, files) => {
    for (const file of files) {
      fs.readFile(`${pathCSS}/${file}`, 'utf8', async (err0, css) => {
        console.log('\n Path css convert to support ie: ', config.paths.dist + '/styles/' + file)
        if (err0) { console.log(err0) } else {
          const output = postcss([cssvariables({
            // preserve: true
          })]).process(css).css
          fs.writeFile(`${pathCSS}/${file}`, output, function (err1) {
            if (err1) {
              console.log(err1)
              return
            }
          })
        }
      })
    }
  })
}
start()
