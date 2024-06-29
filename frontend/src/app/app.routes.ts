import { Routes } from '@angular/router';
import { HomeComponent } from './components/home/home.component';
import { ElementPageComponent } from './components/element/element-page/element-page.component';
import { AssortmentComponent } from './assortment/assortment.component';

export const routes: Routes = [
    { path: '', component: HomeComponent },
    { path: 'assortment', component: AssortmentComponent },
    { path: 'product/:productId', component: ElementPageComponent}
    // { path: '**', component: AboutComponent }
];
