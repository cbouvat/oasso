import globals from "globals";
import pluginJs from "@eslint/js";
import tailwind from "eslint-plugin-tailwindcss";

export default [
    { languageOptions: { globals: globals.browser } },
    pluginJs.configs.recommended,
    ...tailwind.configs["flat/recommended"]
];
