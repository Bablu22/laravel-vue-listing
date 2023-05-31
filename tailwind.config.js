/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js", "./resources/**/*.vue",],
    darkMode: 'class',
    theme: {

        extend: {},
        fontFamily: {
            sans: ['Sora', 'sans-serif'],
        },
    },
    plugins: [require('@tailwindcss/forms'),],
}

