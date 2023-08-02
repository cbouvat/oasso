module.exports = {
    env: {
        browser: true,
        es2021: true
    },
    extends: ['plugin:tailwindcss/recommended', 'standard'],
    overrides: [],
    parserOptions: {
        ecmaVersion: 'latest',
        sourceType: 'module'
      },
    plugins: ['tailwindcss'],
    rules: {
        'tailwindcss/no-custom-classname': ['warn', {
            cssFiles: [
                'resources/css/app.css'
            ]
        }]
    }
}
