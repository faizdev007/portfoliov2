import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Enables dark mode
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                caveat: ["Caveat", "cursive"], // Add Caveat font here
                barriecito: ["Barriecito", "system-ui"],
                doto: ["Doto", "system-ui"],
                bungeeShade:["Bungee Shade", "sans-serif"],
                orbitron:["Orbitron", "sans-serif"],
                kalam:["Kalam", "cursive"],
            },
            colors: {
                blue1: "#EBE5C2", // Custom primary blue
                blue2: "#F8F3D9", // Custom secondary purple
                blue3: "#504B38", // Custom accent yellow
            },
        },
    },

    plugins: [forms],
};
