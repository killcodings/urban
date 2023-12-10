import { useBlockProps } from '@wordpress/block-editor';
export default function save() {
	return <p { ...useBlockProps.save() }>{ 'G1221!' }</p>;
}
