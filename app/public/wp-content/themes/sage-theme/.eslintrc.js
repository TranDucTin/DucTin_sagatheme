module.exports = {
  'root': true,
  'extends': 'eslint:recommended',
  'globals': {
    'wp': true,
  },
  'env': {
    'node': true,
    'es6': true,
    'amd': true,
    'browser': true,
    'jquery': true,
  },
  'parserOptions': {
    'ecmaFeatures': {
      'globalReturn': true,
      'generators': false,
      'objectLiteralDuplicateProperties': false,
      'experimentalObjectRestSpread': true,
    },
    'ecmaVersion': 2017,
    'sourceType': 'module',
  },
  'plugins': [
    'import',
  ],
  'settings': {
    'import/core-modules': [],
    'import/ignore': [
      'node_modules',
      '\\.(coffee|scss|css|less|hbs|svg|json)$',
    ],
  },
  'rules': {
    'no-console': 0,
    'quotes': ['error', 'single'],
    'comma-dangle': [
      'error',
      'never',
      {
        'arrays': 'always-multiline',
        'objects': 'always-multiline',
        'imports': 'always-multiline',
        'exports': 'always-multiline',
        'functions': 'ignore',
      },
    ],
    'no-unused-vars': 'off',
    'no-undef': 'off',
  },
};
