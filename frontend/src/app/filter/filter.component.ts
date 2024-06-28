import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Price, Section, Sort } from '../interfaces/filter.interface';
import { FilterService } from '../services/filter.service';

@Component({
  selector: 'app-filter',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './filter.component.html'
})
export class FilterComponent implements OnInit {
  isSpoilerVisible: boolean[] = [];
  categories!: Section;
  price!: Price;
  tags!: Section;
  sort!: Sort;

  constructor(private filterService: FilterService) {}

  ngOnInit(): void {
    this.categories = this.filterService.getCategories();
    this.price = this.filterService.getPrice();
    this.tags = this.filterService.getTags();
    this.sort = this.filterService.getSort();
    this.isSpoilerVisible = [false, false, false, false];
  }

  toggleSpoiler(index: number) {
    this.isSpoilerVisible[index] = !this.isSpoilerVisible[index];
  }
}
