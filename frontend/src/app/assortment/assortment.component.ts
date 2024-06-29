import { Component, Input, OnInit } from '@angular/core';
import { GridListComponent } from '../components/grid-list/grid-list.component';
import { FilterComponent } from '../filter/filter.component';
import { AssortmentTitleComponent } from './assortment-title/assortment-title.component';
import { TagField } from '../interfaces/filter.interface';
import { FilterService } from '../services/filter.service';

@Component({
  selector: 'app-assortment',
  standalone: true,
  imports: [FilterComponent, GridListComponent, AssortmentTitleComponent],
  templateUrl: './assortment.component.html'
})
export class AssortmentComponent implements OnInit{
  @Input() collection!: string;
  tags!: TagField[];

  constructor(private productParams: FilterService) {}

  ngOnInit(): void {
    this.tags = this.productParams.getTags();
  }
}
