module.exports = {
    root: true,
    extends: "eslint:recommended",
    globals: {
        wp: true
    },
    env: {
        node: true,
        es6: true,
        browser: true,
        jquery: true
    },
    parserOptions: {
        sourceType: "module"
    },
    rules: {
        "no-console": 0
    }
};
