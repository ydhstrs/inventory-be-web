const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        textColor:{
            white:'#fff',
            primaryColor:'#FF6501',
            secondaryColor:'#051951',
            softIndigoColor:'#F7F8FC',
            indigoColor:'#5C6BC0',
            softPinkColor:'#FFF7FA',
            pinkColor:'#EC407A',
            softGreenColor:'#F0FAFA',
            greenColor:'#069697',
            black:'#0000'
        },
        colors:{
            primaryColor:'#FF6501',
            secondaryColor:'#051951',
            softIndigoColor:'#F7F8FC',
            indigoColor:'#5C6BC0',
            softPinkColor:'#FFF7FA',
            pinkColor:'#EC407A',
            softGreenColor:'#F0FAFA',
            greenColor:'#069697',
            black:'#0000'
        }
    },

    plugins: [require('@tailwindcss/forms')],
};
