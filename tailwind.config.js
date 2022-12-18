const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require("tailwindcss/colors");


/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            
        },
        textColor: {
            white: '#fff',
            primaryColor: '#FF6501',
            secondaryColor: '#051951',
            softIndigoColor: '#F7F8FC',
            indigoColor: '#5C6BC0',
            softPinkColor: '#FFF7FA',
            pinkColor: '#EC407A',
            softGreenColor: '#F0FAFA',
            greenColor: '#069697',
            black: '#0000',
            purple: '#C273FF',
            grey: '#F1F6F5',
        },
        colors: {
            primaryColor: '#FF6501',
            secondaryColor: '#051951',
            softIndigoColor: '#F7F8FC',
            indigoColor: '#5C6BC0',
            softPinkColor: '#FFF7FA',
            pinkColor: '#EC407A',
            softGreenColor: '#F0FAFA',
            greenColor: '#069697',
            black: '#0000',
            purple: '#C273FF',
            white: '#fff',
            blue: '#5D5FEF',
            grey: '#F1F6F5',
            ...colors,
        }
    },

    plugins: [
        require('@tailwindcss/forms'),
        //  require('flowbite/plugin'), 
        ],
};
