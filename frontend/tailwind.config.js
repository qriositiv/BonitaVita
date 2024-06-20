/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,ts}",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#ffe4e6',
          100: '#fecdd3',
          200: '#fda4af',
          300: '#fb7185',
          400: '#f43f5e',
          500: '#e11d48',
          600: '#be123c',
          700: '#9f1239',
          800: '#FFFDD0',
          900: '#e9b59ceb',
        },
        secondary: {
          50: '#ecfdf5',
          100: '#d1fae5',
          200: '#a7f3d0',
          300: '#6ee7b7',
          400: '#34d399',
          500: '#10b981',
          600: '#059669',
          700: '#047857',
          800: '#065f46',
          900: '#064e3b',
        },
        dark: {
          50: '#f7fafc',
          100: '#edf2f7',
          200: '#e2e8f0',
          300: '#cbd5e0',
          400: '#a0aec0',
          500: '#718096',
          600: '#4a5568',
          700: '#2d3748',
          800: '#1a202c',
          900: '#333333',
        },
        
      },
      fontFamily: {
        comfortaa: ['Comfortaa', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
