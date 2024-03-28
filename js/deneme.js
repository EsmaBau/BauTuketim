const editor = new DataTable.Editor({
    ajax: '../php/staff.php',
    fields: [
        {
            label: 'First name:',
            name: 'first_name'
        },
        {
            label: 'Last name:',
            name: 'last_name'
        },
        {
            label: 'Position:',
            name: 'position'
        },
        {
            label: 'Office:',
            name: 'office'
        },
        {
            label: 'Extension:',
            name: 'extn'
        },
        {
            label: 'Start date:',
            name: 'start_date',
            type: 'datetime'
        },
        {
            label: 'Salary:',
            name: 'salary'
        }
    ],
    table: '#example'
});
 
const table = new DataTable('#example', {
    ajax: '../php/staff.php',
    columns: [
        {
            data: null,
            orderable: false,
            render: DataTable.render.select()
        },
        { data: 'first_name' },
        { data: 'last_name' },
        { data: 'position' },
        { data: 'office' },
        { data: 'start_date' },
        { data: 'salary', render: DataTable.render.number(null, null, 0, '$') }
    ],
    layout: {
        topStart: {
            buttons: [
                { extend: 'create', editor: editor },
                { extend: 'edit', editor: editor },
                { extend: 'remove', editor: editor }
            ]
        }
    },
    order: [[1, 'asc']],
    select: {
        style: 'os',
        selector: 'td:first-child'
    }
});
 
// Activate an inline edit on click of a table cell
table.on('click', 'tbody td:not(:first-child)', function (e) {
    editor.inline(this);
});