import {useBlockProps, RichText, InspectorControls, InnerBlocks} from '@wordpress/block-editor';
import {
	ToolbarGroup,
	ToolbarButton,
	DropdownMenu,
	ToolbarDropdownMenu,
	SelectControl,
	PanelBody,
	ToggleControl,
	ColorPicker,
	TextControl
} from "@wordpress/components"
import './editor.scss';
import {__} from "@wordpress/i18n";
const { Fragment } = wp.element;

export default function Edit({attributes, setAttributes}) {
	const {text} = attributes; // {text: text} = attributes
	const {сolorText} = attributes;
	const {maxWidth} = attributes;
	const {textAlign} = attributes;

	let componentStyles = {
		'--сolorText': сolorText,
		'--text-align': textAlign
	};
	if ( !! maxWidth ) {
		componentStyles[ '--max-width' ] = `${ maxWidth }px`;
	}
	const useBlockPropsAttrs = {
		style: componentStyles,
	};
	const ALLOWED_BLOCKS = [ 'core/paragraph', { placeholder: 'paragraph'}];

	return (
		<Fragment>
			<InspectorControls>
				<PanelBody
					title='Цвет текста'
					initialOpen={ false }
				>
					<ColorPicker
						color={ сolorText }
						onChange={
							(value)=> setAttributes({сolorText: value})
						}
						enableAlpha
					/>
				</PanelBody>
				<PanelBody
					title='Ширина текста'
					initialOpen={ false }
				>
					<TextControl
						label="Ширина текста px"
						value={ maxWidth }
						type="number"
						min="754"
						max="854"
						onChange={
							(value)=> setAttributes({maxWidth: value})
						}
					/>
				</PanelBody>
				<PanelBody
					title={ __( 'Выравнивание текста', 'paragraph-max-width' ) }
					initialOpen={ true }
					>
					<SelectControl
						value={ textAlign }
						options={ [
							{ label: 'Центр', value: 'center' },
							{ label: 'Слева', value: 'left' },
							{ label: 'Справа', value: 'right' },
						] }
						onChange={
							(value)=> setAttributes({textAlign: value})
						}
					/>
				</PanelBody>
			</InspectorControls>

			<div
				className="cg-description"
				// style={{"--color": "#101828", "--text-align": "left", "--max-width": "754px"}}
				{ ...useBlockPropsAttrs }
			>
				<RichText
					{ ...useBlockProps() }
					onChange={(value)=> setAttributes({text: value})}
					value={text}
					placeholder={"Your text"}
					tagName="p"
					// allowedFormats={['core/bold']}
					allowedFormats={[]}
				/>
				<InnerBlocks allowedBlocks={ ALLOWED_BLOCKS } />
			</div>
		</Fragment>
	);
}
