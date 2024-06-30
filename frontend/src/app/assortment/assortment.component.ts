import { Component, Input, OnInit } from '@angular/core';
import { GridListComponent } from '../components/grid-list/grid-list.component';
import { FilterComponent } from '../filter/filter.component';
import { AssortmentTitleComponent } from './assortment-title/assortment-title.component';
import { TagField } from '../interfaces/filter.interface';
import { FilterService } from '../services/filter.service';
import { ClickedOutside } from '../directives/ClickedOutside.directive';

@Component({
  selector: 'app-assortment',
  standalone: true,
  imports: [FilterComponent, GridListComponent, AssortmentTitleComponent, ClickedOutside],
  templateUrl: './assortment.component.html'
})
export class AssortmentComponent implements OnInit{
  @Input() collection!: string;
  tags!: TagField[];
  filterSidebarOpen: boolean = false;

  constructor(private productParams: FilterService) {}

  ngOnInit(): void {
    this.tags = this.productParams.getTags();
  }

  toggleSidebar(): void {
    this.filterSidebarOpen = !this.filterSidebarOpen;
  }

  onClickedOutside(): void {
    this.filterSidebarOpen = false;
  }
}
