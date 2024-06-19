import { Component } from '@angular/core';
import { ClickedOutside } from '../../../directives/ClickedOutside.directive';

@Component({
  selector: 'app-sidebar',
  standalone: true,
  imports: [ClickedOutside],
  templateUrl: './sidebar.component.html'
})
export class SidebarComponent{
  dropdownOpen: boolean = false;

  toggleDropdown(): void {
    this.dropdownOpen = !this.dropdownOpen;
  }

  onClickedOutside(): void {
    this.dropdownOpen = false;
  }
}
