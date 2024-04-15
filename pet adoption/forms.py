# pet_adoption/forms.py

from django import forms
from .models import PetParent

class PetParentForm(forms.ModelForm):
    class Meta:
        model = PetParent
        fields = '__all__'
