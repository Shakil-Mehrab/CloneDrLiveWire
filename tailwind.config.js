const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            white: colors.white,
            black: colors.black,
            gray: colors.coolGray,
            red: colors.red,
            blue: colors.sky,
            purple: colors.violet,
            yellow: colors.amber,
            green: colors.green,
            cyan: colors.cyan,
            pink: colors.pink,
            indigo: colors.indigo,
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            content: {
                quote: "+GST"
            }
        },
    },

    variants: {
        extend: {
            opacity: ['responsive', 'group-hover', 'hover', 'focus', 'disabled'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
    ],
};