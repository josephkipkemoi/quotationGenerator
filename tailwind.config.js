const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            transitionProperty: {
                'height': 'height',
                'spacing': 'margin, padding',
            },
            animation: {
                wiggle: 'wiggle 1s ease-in-out infinite',
                'spin-slow': 'spin 3s linear infinite',
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            transitionProperty: ['responsive', 'motion-safe', 'motion-reduce'],
            animation: ['hover', 'focus'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
