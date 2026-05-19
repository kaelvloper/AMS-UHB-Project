import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', 'Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    50:  '#eef2ff',
                    100: '#e0e7ff',
                    400: '#818cf8',
                    500: '#6366f1',
                    600: '#4f46e5',
                    700: '#4338ca',
                    900: '#312e81',
                }
            },
            backdropBlur: {
                xs: '2px',
            },
            animation: {
                'fade-in':    'fadeIn 0.3s ease both',
                'slide-up':   'slideUp 0.4s ease both',
                'pulse-slow': 'pulse 3s ease-in-out infinite',
            },
            keyframes: {
                fadeIn:  { from: { opacity: 0 }, to: { opacity: 1 } },
                slideUp: { from: { opacity: 0, transform: 'translateY(16px)' }, to: { opacity: 1, transform: 'translateY(0)' } },
            },
            boxShadow: {
                'glass':  '0 4px 24px -1px rgba(0,0,0,0.08)',
                'glow-indigo': '0 0 24px rgba(99,102,241,0.3)',
                'glow-cyan':   '0 0 24px rgba(6,182,212,0.3)',
            }
        },
    },

    // Safelist dynamic color classes used in Blade templates
    safelist: [
        { pattern: /^(bg|text|border|ring)-(emerald|blue|amber|orange|red|indigo|violet|cyan|slate|purple|rose|green|teal)-(50|100|200|300|400|500|600|700|800|900)/ },
        { pattern: /^(bg|text|border)-(emerald|blue|amber|orange|red|indigo|violet|cyan|purple)-(900)\/(20|30|40)/ },
        'gradient-primary', 'gradient-success', 'gradient-warning', 'gradient-info', 'gradient-danger',
        'glass-card', 'glass-card-hover', 'stat-card', 'grade-A', 'grade-B', 'grade-C', 'grade-D', 'grade-E',
        'btn-primary', 'btn-secondary', 'input-modern', 'select-modern',
    ],

    plugins: [forms, typography],
};
