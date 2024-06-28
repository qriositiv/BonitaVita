import { Component } from '@angular/core';
import { GridListComponent } from '../components/grid-list/grid-list.component';
import { FilterComponent } from '../filter/filter.component';

@Component({
  selector: 'app-assortment',
  standalone: true,
  imports: [FilterComponent, GridListComponent],
  templateUrl: './assortment.component.html'
})
export class AssortmentComponent {

}
