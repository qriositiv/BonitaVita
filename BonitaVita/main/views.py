from django.shortcuts import render
from django.http import HttpResponse

def about(request):
    return render(request, 'main/about/about.html')

def contacts(request):
    return render(request, 'main/contacts/contacts.html')