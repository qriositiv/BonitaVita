import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-image-carousel',
  standalone: true,
  imports: [],
  templateUrl: './image-carousel.component.html'
})
export class ImageCarouselComponent {
  @Input() images!: string[];
  currentImageIndex: number = 0;

  onPrevImage() {
    this.currentImageIndex = (this.currentImageIndex > 0) ? this.currentImageIndex - 1 : this.images.length - 1;
  }

  onNextImage() {
    this.currentImageIndex = (this.currentImageIndex < this.images.length - 1) ? this.currentImageIndex + 1 : 0;
  }
}
