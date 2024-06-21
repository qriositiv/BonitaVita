import { Component, Input } from '@angular/core';
import { SoapPreview } from '../../interfaces/soap.interface';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-element-box',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './element-box.component.html'
})
export class ElementBoxComponent {
  @Input() soap!: SoapPreview;
}
