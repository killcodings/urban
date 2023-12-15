import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, BlockControls, InspectorControls, MediaPlaceholder } from '@wordpress/block-editor';
import { ToolbarGroup, ToolbarButton, DropdownMenu, ToolbarDropdownMenu, SelectControl, PanelBody, ToggleControl } from "@wordpress/components"
import './editor.scss';

export default function Edit({attributes, setAttributes}) {

	// console.log(attributes)
	const {text} = attributes; // {text: text} = attributes
	const {text2} = attributes;
	const {texth1} = attributes;
	const {isBage} = attributes;
	const {urlMedia} = attributes;

	const toggleControl = (isBage) => {
		console.log(isBage);
	}

	return (
		<>
			<InspectorControls>
{/*				<PanelBody
					title={ __( 'Тег кнопки', 'custom-button' ) }
					initialOpen={ true }
				>
					<SelectControl
						// value={ }
						options={ [
							{ label: 'Button', value: 'button' },
							{ label: 'Div', value: 'div' },
							{ label: 'Link', value: 'a' },
						] }
					/>
				</PanelBody>*/}

				<PanelBody>
					<ToggleControl
						label="Toggle bage"
						// checked={isBage}
						onChange={toggleControl}
					/>
				</PanelBody>
			</InspectorControls>



			{/*<BlockControls group="inline">
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
			</BlockControls>*/}

			<MediaPlaceholder
				allowedTypes={ [ 'image' ] }
				multiple={ false }
				labels={ {
					title: 'Вставить фоновое изображение',
				} }
				disableDropZone="true"
				// onSelect={ ( media ) =>
				// 	props.setAttributes( {
				// 		url: media.url,
				// 		alt: media.alt || '',
				// 		mediaId: media.id,
				// 	} )
				// }
				onSelect={(media) => setAttributes({urlMedia: media.url})}
				// onSelect={(media) => console.log(media)}
			/>

			<section className="cg-heroscreen"  style={{"background-image": `url('${urlMedia}')`}}>

				<div className="cg-bage">
					<RichText
						{ ...useBlockProps() }
						onChange={(value)=> setAttributes({text: value})}
						// onChange={(text)=> console.log(text)}
						value={text}
						placeholder={"Your text"}
						tagName="p"
						// allowedFormats={['core/bold']}
						allowedFormats={[]}
					/>
				</div>

				<RichText
					{ ...useBlockProps({
						className: 'cg-heroscreen__title cg-first-title',
						style: {"--color": "#FFF"}
					}) }
					onChange={(value)=> setAttributes({texth1: value})}
					value={texth1}
					placeholder={"Online..."}
					tagName="h1"
					allowedFormats={[]}
				/>
				<div className="cg-title-description cg-heroscreen__text"
					 style={{"--color": "#FFF", "--text-align": "center"}}>
						<RichText
							{ ...useBlockProps() }
							onChange={(value)=> setAttributes({text2: value})}
							value={text2}
							placeholder={"Your text"}
							tagName="p"
							allowedFormats={[]}
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
		</>
	);
}
