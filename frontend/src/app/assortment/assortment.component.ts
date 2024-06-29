import { Component, Input } from '@angular/core';
import { GridListComponent } from '../components/grid-list/grid-list.component';
import { FilterComponent } from '../filter/filter.component';
import { AssortmentTitleComponent } from './assortment-title/assortment-title.component';

@Component({
  selector: 'app-assortment',
  standalone: true,
  imports: [FilterComponent, GridListComponent, AssortmentTitleComponent],
  templateUrl: './assortment.component.html'
})
export class AssortmentComponent {
  @Input() collection!: string;
}
