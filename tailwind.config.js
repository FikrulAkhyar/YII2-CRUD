/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.php"],
  theme: {
		extend: {},
		fontFamily: {
			sans: ["Quicksand", "sans-serif"],
			display: ["Quicksand", "sans-serif"],
		},
	},
  plugins: [require("daisyui")],
  daisyui: {
	themes: [
        {
          	mytheme: {
				"primary": "#f4b5d2",
				"secondary": "#0f8c17",
				"accent": "#a87ff9",
				"neutral": "#1e2329",
				"base-100": "#f2f2f2",
				"info": "#3eccf4",
				"success": "#51ecd4",
				"warning": "#bfa008",
				"error": "#f50a16",
			},
		},
	],
	},
}