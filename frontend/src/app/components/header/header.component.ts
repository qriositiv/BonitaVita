import { Component } from '@angular/core';
import { SidebarComponent } from './sidebar/sidebar.component';
import { LanguageDropdownComponent } from './language-dropdown/language-dropdown.component';

@Component({
  selector: 'app-header',
  standalone: true,
  imports: [SidebarComponent, LanguageDropdownComponent],
  templateUrl: './header.component.html',
})
export class HeaderComponent {
  sidebarVisible = false;

  toggleSidebar() {
    this.sidebarVisible = !this.sidebarVisible;
  }
}
