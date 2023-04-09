/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: ['./**/*.php'],
  theme: {
    screens: {
      xs: '475px',
      ...defaultTheme.screens,
    },
    extend: {
      colors: {
        transparent: 'transparent',
        current: 'currentColor',
        white: '#ffffff',
        plum: {
          50: '#faf8fb',
          100: '#f4f1f6',
          200: '#e8e1ed',
          300: '#d8c9de',
          400: '#c0a9c9',
          500: '#a385b0',
          600: '#866792',
          700: '#795b83', //primary
          800: '#5b4563',
          900: '#4e3c53',
        },
        lilac: {
          50: '#f8f8fa',
          100: '#f3f1f6',
          200: '#e8e6ee',
          300: '#d6d1e1',
          400: '#b4aac6', //primary
          500: '#a798ba',
          600: '#9280a7',
          700: '#806d94',
          800: '#6b5b7c',
          900: '#594c66',
        },
        rust: {
          50: '#fcf5f4',
          100: '#fae9e6',
          200: '#f6d8d2',
          300: '#eebdb3',
          400: '#e39686',
          500: '#d16852', //primary
          600: '#c05842',
          700: '#a14734',
          800: '#853e2f',
          900: '#70382c',
        },
        daisy: {
          50: '#fdfaef',
          100: '#faf2da',
          200: '#f2dca4', //primary
          300: '#edcd84',
          400: '#e5af52',
          500: '#df9830',
          600: '#d07f26',
          700: '#ad6421',
          800: '#8a4f22',
          900: '#70421e',
        },
        lime: {
          50: '#f5fbf2',
          100: '#e8f7e1',
          200: '#d2edc5',
          300: '#9dd682', //primary
          400: '#82c563',
          500: '#60a93e',
          600: '#4c8b2e',
          700: '#3d6e27',
          800: '#335823',
          900: '#2b481f',
        },
        teal: {
          50: '#effbfc',
          100: '#d7f4f6',
          200: '#b3e7ee',
          300: '#7fd4e1',
          400: '#4bbbce', //primary
          500: '#289cb2',
          600: '#247f96',
          700: '#24677a',
          800: '#255565',
          900: '#234756',
        },
        persimmon: {
          50: '#fff3f1',
          100: '#ffe3df',
          200: '#ffcdc5',
          300: '#ffaa9d',
          400: '#ff7864',
          500: '#ff6048', //primary
          600: '#ed3115',
          700: '#c8260d',
          800: '#a5230f',
          900: '#882314',
        },
        bahamas: {
          50: '#eff8ff',
          100: '#dff0ff',
          200: '#b7e3ff',
          300: '#78ceff',
          400: '#30b6ff',
          500: '#059cf2',
          600: '#007dcf',
          700: '#0063a7',
          800: '#025b96', //primary
          900: '#084672',
        },
        darkGrey: '#414141',
      },
      fontFamily: {
        heading: ['var(--font-poppins)', 'sans-serif'],
        openSans: ['var(--font-open-sans)', 'sans-serif'],
      },
      typography: {
        DEFAULT: {
          css: {
            color: 'text-darkGrey',
            strong: {
              color: '#414141',
              fontWeight: '700',
            },
            a: {
              color: '#d16852',
              fontWeight: '700',
              textDecoration: 'none',
              borderBottom: '1px solid #d16852',
              transition: 'all 300ms',
              '@media (min-width: 768px)': {
                '&:hover': {
                  borderBottom: '2px solid #d16852',
                },
              },
            },
          },
        },
      },
    },
    corePlugins: {
      aspectRatio: false,
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/typography'),
  ],
}
