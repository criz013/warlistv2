import {Controller} from '@hotwired/stimulus';
import DataTable from 'datatables.net';
import $ from 'jquery';
export default class extends Controller {
  static values = {
    data:Array
  }
  connect() {

    let datatable = new DataTable('#datatable', {
      responsive: true,
      autoWidth: true,
      columnDefs: [
        {className: "px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white", targets: "_all"},
      ],
      headerCallback: function (thead, data, start, end, display) {
        $(thead).addClass("px-6 py-3 ");
      },
      createdRow: function (row, data, dataIndex) {
        $(row).addClass('bg-white border-b dark:bg-gray-800 dark:border-gray-700');
      },
      columns: [
        { title: 'Name' },
        { title: 'Mouvement' },
        { title: 'toughness' },
        { title: 'Save' },
        { title: 'wounds' },
        { title: 'Leadership' },
        { title: 'objective_control' },
        { title: 'invulnerable_save' },
      ],
      data: this.dataValue
    });
  }

  show() {
  }
}
