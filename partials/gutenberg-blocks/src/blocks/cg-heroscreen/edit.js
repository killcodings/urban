import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, BlockControls } from '@wordpress/block-editor';
import { ToolbarGroup, ToolbarButton, DropdownMenu, ToolbarDropdownMenu } from "@wordpress/components"
import './editor.scss';
export default function Edit({attributes, setAttributes}) {
	// console.log(attributes)
	const {text} = attributes // {text: text} = attributes
	return (
		<>
			<BlockControls group="inline">
				<p>Inline Controls</p>
			</BlockControls>
			<BlockControls group="block">
				<p>Block Controls</p>
			</BlockControls>
			<BlockControls
				controls={ [
					{
						title: 'Button 1',
						icon: 'admin-generic',
						isActive: true,
						onClick: () => console.log( 'Button 1 Clicked' ),
					},
					{
						title: 'Button 2',
						icon: 'admin-collapse',
						onClick: () => console.log( 'Button 2 Clicked' ),
					},
				] }
			>
				{ text && (
					<ToolbarGroup>
						<ToolbarButton
							title={ __( 'Align Left', 'text-box' ) }
							icon="editor-alignleft"
							onClick={ () => console.log( 'Align Left' ) }
						/>
						<ToolbarButton
							title={ __( 'Align Center', 'text-box' ) }
							icon="editor-aligncenter"
							onClick={ () => console.log( 'Align center' ) }
						/>
						<ToolbarButton
							title={ __( 'Align Right', 'text-box' ) }
							icon="editor-alignright"
							onClick={ () => console.log( 'Align Right' ) }
						/>
						<ToolbarDropdownMenu
							icon="arrow-down-alt2"
							label={ __( 'More Alignments', 'text-box' ) }
							controls={ [
								{
									title: __( 'Wide', 'text-box' ),
									icon: 'align-wide',
								},
								{
									title: __( 'Full', 'text-box' ),
									icon: 'align-full-width',
								},
							] }
						/>
					</ToolbarGroup>
				) }
				<ToolbarGroup>
					<p>Group 2</p>
				</ToolbarGroup>
			</BlockControls>

			<section className="cg-heroscreen">
				<div className="cg-bage">
					<RichText
						{ ...useBlockProps() }
						onChange={(value)=> setAttributes({text: value})}
						value={text}
						placeholder={"Your text"}
						tagName="div"
						// allowedFormats={['core/bold']}
						allowedFormats={[]}
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

		</>
	);
}
