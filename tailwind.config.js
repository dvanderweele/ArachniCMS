// module.exports = {
//   theme: {
//     extend: {},
//     colors: {
//       background: {
//         primary: 'var(--bg-background-primary)',
//         secondary: 'var(--bg-background-secondary)',
//         tertiary: 'var(--bg-background-tertiary)',
//         ruthieslight: 'rgba(255,122,0,0.1)',
//         ruthiesdark: 'rgb(255,122,0)',
  
//         form: 'var(--bg-background-form)',
//       },
//       copy: {
//         primary: 'var(--text-copy-primary)',
//         secondary: 'var(--text-copy-secondary)',
//       },
//     },
//     pagination: {
//       link: 'bg-background-primary px-3 py-1 border-r border-t border-b text-copy-primary no-underline',
//       linkActive: 'bg-background-secondary font-bold',
//       linkSecond: 'rounded-l border-l',
//       linkBeforeLast: 'rounded-r',
//       linkFirst: {
//           '@apply mr-3 pl-5 border': {},
//           'border-top-left-radius': '999px',
//       },
//       linkLast: {
//           '@apply ml-3 pr-5 border': {},
//           'border-top-right-radius': '999px',
//       },
//     },
//   },
//   variants: {},
//   plugins: [
//     require('tailwindcss-plugins/pagination'),
//   ]
// }


module.exports = {
  theme: {
    extend: {
      colors: {
        background: {
          primary: 'var(--bg-background-primary)',
          secondary: 'var(--bg-background-secondary)',
          tertiary: 'var(--bg-background-tertiary)',
          ruthieslight: 'rgba(255,122,0,0.1)',
          ruthiesdark: 'rgb(255,122,0)',
    
          form: 'var(--bg-background-form)',
        },
        copy: {
          primary: 'var(--text-copy-primary)',
          secondary: 'var(--text-copy-secondary)',
        },
      },
    },
    fontFamily: {
      'sans': ['-apple-system', 'BlinkMacSystemFont', '"Segoe UI"', 'Roboto', '"Helvetica Neue"', 'Arial', '"Noto Sans"', 'sans-serif', '"Apple Color Emoji"', '"Segoe UI Emoji"', '"Segoe UI Symbol"', '"Noto Color Emoji"'],

      'serif': ['Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],

      'mono': ['SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', 'Liberation Mono', '"Courier New"', 'monospace'],

      'alegreya': ['alegreyaregular', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],

      'alegreya-sc': ['alegreya_scregular', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],

      'alegreya-sans': ['alegreya_sansregular', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],

      'alegreya-sans-sc': ['alegreya_sans_scregular', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],

      'fira-code': ['fira_coderegular', 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', '"Liberation Mono"', '"Courier New"', 'monospace'],
      
      'hack': ['hackregular', 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', '"Liberation Mono"', '"Courier New"', 'monospace'],

      'montserrat': ['montserratregular', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],

      'quicksand': ['quicksandregular', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
    },
    pagination: {
      link: 'bg-background-primary px-3 py-1 border-r border-t border-b text-copy-primary no-underline',
      linkActive: 'bg-background-secondary font-bold',
      linkSecond: 'rounded-l border-l',
      linkBeforeLast: 'rounded-r',
      linkFirst: {
          '@apply mr-3 pl-5 border': {},
          'border-top-left-radius': '999px',
      },
      linkLast: {
          '@apply ml-3 pr-5 border': {},
          'border-top-right-radius': '999px',
      },
    },
  },
  variants: {},
  plugins: [
    require('tailwindcss-plugins/pagination'),
  ]
}