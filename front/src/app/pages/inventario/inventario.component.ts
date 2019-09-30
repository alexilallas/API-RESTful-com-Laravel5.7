import { Component, OnInit } from '@angular/core';
import { Inventario } from './inventario';
import { InventarioService } from './inventario.service';
import { NgxSmartModalService } from 'ngx-smart-modal';
import { DatatablesComponent } from '../../shared/datatables/datatables.component';

import { faPills, IconDefinition } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'inventario-cmp',
  moduleId: module.id,
  templateUrl: 'inventario.component.html',
  styleUrls: ['./inventario.component.scss']
})

export class InventarioComponent extends DatatablesComponent implements OnInit {

  public form = new Inventario();
  public modal = 'inventarioModal';
  public itensInventario: Inventario[] = [];
  public isNewItem: boolean = true;
  public faPills: IconDefinition = faPills;

  constructor
    (
      public ngxSmartModalService: NgxSmartModalService,
      private inventarioService: InventarioService,
  ) {
    super();
    console.log('InventarioComponent')
  }

  ngOnInit() {
    this.getItens()
  }

  getItens(): any {
    this.inventarioService.getItens()
      .subscribe(response => {
        this.itensInventario = response
      })
  }

  save() {
    this.savePaciente()
    InventarioService.itemCreatedAlert.subscribe(
      () => {
        this.eraseForm()
        this.getItens()
        this.close()
        InventarioService.itemCreatedAlert.isStopped = true
      }
    )
  }

  savePaciente() {
    this.inventarioService.postItem(this.form)
  }

  openFormEdit(id) {
    this.isNewItem = false
    this.inventarioService.getItemById(id)
      .subscribe(response => {
        this.form = response
      })
    this.ngxSmartModalService.open(this.modal)
  }


  update() {
    this.updateItem()
    InventarioService.itemUpdatedAlert.subscribe(
      () => {
        this.eraseForm()
        this.getItens()
        this.close()
        InventarioService.itemUpdatedAlert.isStopped = true
      }
    )

  }

  updateItem() {
    this.inventarioService.updateItem(this.form)
  }

  close() {
    this.isNewItem = true
    this.eraseForm()
    this.ngxSmartModalService.close(this.modal)
  }

  eraseForm() {
    this.form = {}
  }

}
