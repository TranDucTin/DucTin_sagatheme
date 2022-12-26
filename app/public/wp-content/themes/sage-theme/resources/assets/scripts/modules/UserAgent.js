
export default class UserAgent {
  constructor () {
    this.$html = $('html')
  }
  init () {
    console.log('test')
  }
}

new UserAgent().init()
