import { Component } from '@angular/core';
import { SidebarComponent } from './sidebar/sidebar.component';
import { LanguageDropdownComponent } from './language-dropdown/language-dropdown.component';
import { RouterLink } from '@angular/router';
import { Menu } from '../../interfaces/menu.interface';
import { MenuService } from '../../services/menu.service';

@Component({
  selector: 'app-header',
  standalone: true,
  imports: [SidebarComponent, LanguageDropdownComponent, RouterLink],
  templateUrl: './header.component.html',
})
export class HeaderComponent {
  sidebarVisible = false;
  menu!: Menu[];

  constructor(private menuService: MenuService) {
    this.menu = this.menuService.getMenu();
    console.log(this.menu);
  }

  toggleSidebar() {
    this.sidebarVisible = !this.sidebarVisible;
  }
}
