import { Injectable } from '@angular/core';
import { Locale } from '../interfaces/locale.interface';

@Injectable({
  providedIn: 'root'
})
export class LanguageService {

  constructor() { }

  getCurrentLocaleCode(): string {
    return '';
  }

  getCurrentLocale(): Locale {
    return { code: 'RU', label: 'Русский', flag: 'ru' };
  }

  getAllLocales(): Locale[] {
    return [
        { code: 'RU', label: 'Русский', flag: 'ru' },
        { code: 'EN', label: 'English', flag: 'gb' },
        { code: 'LT', label: 'Lietuvių', flag: 'lt' },
    ];
  }
}
