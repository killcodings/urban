import { useBlockProps, RichText } from '@wordpress/block-editor';
export default function save({attributes}) {
	const {text} = attributes;
	const {text2} = attributes;
	const {texth1} = attributes;
	const {isBage} = attributes;
	const {urlMedia} = attributes;
	// console.log(attributes)
	console.log("urlMedia ", urlMedia);
	return (

	<section className="cg-heroscreen" style={{"background-image": `url('${urlMedia}')`}}>

		<div className="cg-bage">
			<RichText.Content
				{ ...useBlockProps.save() }
				tagName ="p"
				value = {text}
			/>
		</div>

		<RichText.Content
			{ ...useBlockProps.save({
				className: 'cg-heroscreen__title cg-first-title',
				style: {"--color": "#FFF"}
			}) }
			tagName ="h1"
			value = {texth1}
		/>
		<div className="cg-title-description cg-heroscreen__text"
			 style={{"--color": "#FFF", "--text-align": "center"}}>
			<RichText.Content
				{ ...useBlockProps.save() }
				tagName ="p"
				value = {text2}
			/>
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
