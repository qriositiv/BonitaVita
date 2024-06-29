import { Component, Input } from '@angular/core';
import { SoapPreview } from '../../../interfaces/soap.interface';
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';

@Component({
  selector: 'app-element-box',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './element-box.component.html'
})
export class ElementBoxComponent {
  @Input() soap!: SoapPreview;

  constructor(private router: Router) {}

  onSoapPageOpen(productId: string) {
    this.router.navigate(['product', productId])
  }
}
