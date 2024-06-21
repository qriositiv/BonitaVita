import { Component } from '@angular/core';
import { SidebarComponent } from './sidebar/sidebar.component';
import { LanguageDropdownComponent } from './language-dropdown/language-dropdown.component';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-header',
  standalone: true,
  imports: [SidebarComponent, LanguageDropdownComponent, RouterLink],
  templateUrl: './header.component.html',
})
export class HeaderComponent {
  sidebarVisible = false;
  menuSections: string[] = [
    'Новинки',
    'Ассортимент',
    'Создать мыло',
    'Контакты',
  ]

  toggleSidebar() {
    this.sidebarVisible = !this.sidebarVisible;
  }
}
