import { Component, OnInit } from '@angular/core';
import { ElementBoxComponent } from '../components/element-box/element-box.component';
import { SoapPreview } from '../interfaces/soap.interface';

@Component({
  selector: 'app-grid-list',
  standalone: true,
  imports: [ElementBoxComponent],
  templateUrl: './grid-list.component.html'
})
export class GridListComponent implements OnInit {
  soapList!: SoapPreview[];

  ngOnInit(): void {
    this.soapList = [
      {
        image: 'https://bonitavita.lt/images/soap_images/26A.jpg',
        name: 'Crystal',
        cost: 17.00,
        sale: 15.00,
        tag: 'New'
      },
      {
        image: 'https://bonitavita.lt/images/soap_images/15A.jpg',
        name: 'Olive',
        cost: 9.50,
        tag: 'Popular'
      },
      {
        image: 'https://bonitavita.lt/images/soap_images/24A.jpg',
        name: 'Twinkle',
        cost: 11.00
      },
      {
        image: 'https://bonitavita.lt/images/soap_images/9A.jpg',
        name: 'Aura',
        cost: 11.00
      },
      {
        image: 'https://bonitavita.lt/images/soap_images/9A.jpg',
        name: 'Aura',
        cost: 11.00
      },
      {
        image: 'https://bonitavita.lt/images/soap_images/9A.jpg',
        name: 'Aura',
        cost: 11.00
      }
    ];
  }
}
