import { Component, Input } from '@angular/core';
import { ClickedOutside } from '../../../directives/ClickedOutside.directive';
import { Menu } from '../../../interfaces/menu.interface';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-sidebar',
  standalone: true,
  imports: [ClickedOutside, RouterLink],
  templateUrl: './sidebar.component.html'
})
export class SidebarComponent{
  dropdownOpen: boolean = false;
  @Input() menu!: Menu[];

  toggleDropdown(): void {
    this.dropdownOpen = !this.dropdownOpen;
  }

  onClickedOutside(): void {
    this.dropdownOpen = false;
  }
}
