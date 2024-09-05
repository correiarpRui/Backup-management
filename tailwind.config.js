/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                bblue: "#002f4a",
                bred: "#e53118",
                blgray: "#f0f0f0",
                bdgray: "#6e757a",
                bgray: "#6e757a",
                bbgray: "#e9e9ed",
                bgreen: "#018505",
                borderColor: "#e5e7eb",
            },
            boxShadow: {
                dropMenu: "4px 4px 6px -1px rgb(0 0 0 / 0.1)",
            },
        },
    },
    plugins: [],
};
