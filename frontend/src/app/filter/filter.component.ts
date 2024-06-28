import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Filter } from '../interfaces/filter.interface';
import { FilterService } from '../services/filter.service';

@Component({
  selector: 'app-filter',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './filter.component.html'
})
export class FilterComponent implements OnInit {
  isSpoilerVisible: boolean[] = [];
  filter!: Filter;

  constructor(private filterService: FilterService) {}

  ngOnInit(): void {
    this.filter = this.filterService.getFilter();
    this.isSpoilerVisible = [false, false];
    console.log(this.filter)
  }

  toggleSpoiler(index: number) {
    this.isSpoilerVisible[index] = !this.isSpoilerVisible[index];
  }
}
