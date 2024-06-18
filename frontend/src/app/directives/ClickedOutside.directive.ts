import { Directive, ElementRef, Output, EventEmitter, HostListener, OnInit } from "@angular/core";

@Directive({
  selector: '[ClickedOutside]',
  standalone: true,
})
export class ClickedOutside implements OnInit {
  @Output() clickOutside = new EventEmitter<void>();
  private listening = false;
  constructor(private element: ElementRef) {}

  ngOnInit(): void {
    setTimeout(() => {
      this.listening = true;
    }, 500);
  }

  @HostListener('document:click', ['$event.target'])
  public onDocumentClick(target: any): void {
    if (!this.listening) return;
    const clickedInside = this.element.nativeElement.contains(target);
    if (!clickedInside) {
      this.clickOutside.emit();
    }
  }
}
