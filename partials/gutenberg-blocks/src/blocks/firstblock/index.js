// import Edit from './edit.js'; // Разобраться почему не работает import
// import save from './save.js';
var registerBlockType = wp.blocks.registerBlockType;


registerBlockType("cg/firstblock", {
    edit: function () {
        return "Edit";
    },
    save: function () {
        return "Save";
    }
})
