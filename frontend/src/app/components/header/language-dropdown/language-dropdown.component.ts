import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { ClickedOutside } from '../../../directives/ClickedOutside.directive';
import { LanguageService } from '../../../services/language.service';
import { Locale } from '../../../interfaces/locale.interface';

@Component({
  selector: 'app-language-dropdown',
  standalone: true,
  imports: [CommonModule, ClickedOutside],
  templateUrl: './language-dropdown.component.html'
})
export class LanguageDropdownComponent {
  dropdownOpen: boolean = false;
  locales!: Locale[];
  currentLocale!: Locale;

  constructor(private languageService: LanguageService) {
    this.locales = languageService.getAllLocales();
    this.currentLocale = languageService.getCurrentLocale();
  }

  toggleDropdown(): void {
    this.dropdownOpen = !this.dropdownOpen;
  }

  onClickedOutside(): void {
    this.dropdownOpen = false;
  }
}
