// import Edit from './edit.js'; // Разобраться почему не работает import
// import Save from './save.js';

// import Edit from "./edit";
// import save from "./save";
// import metadata from './block.json';

var registerBlockType = wp.blocks.registerBlockType;
var createElement = wp.element.createElement;

registerBlockType("cg/firstblock", {
    edit: function () {
        return createElement("p", {className: "class-edit"}, "Edit");
    },
    save: function () {
        return createElement("p", null, "Save");;
    }
})

// registerBlockType( metadata.name, {
//     edit: Edit,
//
//     /**
//      * @see ./save.js
//      */
//     save,
// })
