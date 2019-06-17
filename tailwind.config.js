module.exports = {
  theme: {
    extend: {},
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
