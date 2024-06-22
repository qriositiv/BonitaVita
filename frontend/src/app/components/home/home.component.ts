import { Component } from '@angular/core';
import { GridListComponent } from '../grid-list/grid-list.component';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [GridListComponent],
  templateUrl: './home.component.html'
})
export class HomeComponent {
  
}
