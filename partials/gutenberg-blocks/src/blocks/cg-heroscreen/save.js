import { useBlockProps, RichText } from '@wordpress/block-editor';
export default function save({attributes}) {
	const {text} = attributes;
	return (
	<section className="cg-heroscreen">
		<div className="cg-bage">
			<RichText.Content
				{ ...useBlockProps.save() }
				tagName ="div"
				value = {text}
			/>
		</div>
		<h1 className="cg-heroscreen__title cg-first-title"
			style={{"--color": "#FFF"}}
		>
			Online Cricket Betting in India at Best Bookie 2022
		</h1>

		<div className="cg-title-description cg-heroscreen__text"
			 style={{"--color": "#FFF", "--text-align": "center"}}>
			<p>If you love cricket and want to make
				real money from your hobby,
				join one of the
				reliable cricket betting
				bookmakers in India. Our website is completely dedicated to online cricket betting in India.
				Here you will find
				a list of the best cricket betting bookies and their mobile apps for Android and iOS.
			</p>
		</div>

		<div className="cg-heroscreen__buttons">
			<a href="#" className="cg-button" style={{"--bg": "#FFF", "--color": "#D02E4B", "--bg-hover": "#F9FAFB"}}>
				<span className="cg-button__text">Button 1</span>
			</a>
			<a href="#" className="cg-button" style={{"--bg": "#D02E4B", "--color": "#FFF", "--bg-hover": "#B42318"}}>
				<span className="cg-button__text">Button 1</span>
			</a>
		</div>

	</section>
	);
}
