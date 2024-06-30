import { Injectable } from "@angular/core";
import { Menu } from "../interfaces/menu.interface";

@Injectable({
    providedIn: 'root',
  })
export class MenuService {
    getMenu(): Menu[] {
        return [
            { name: 'Главная', route: '/' },
            { name: 'Ассортимент', route: '/assortment' },
            // { name: 'Создать мыло', route: '/create' },
            { name: 'Контакты', route: '/contacts' }
        ];
    }
}
