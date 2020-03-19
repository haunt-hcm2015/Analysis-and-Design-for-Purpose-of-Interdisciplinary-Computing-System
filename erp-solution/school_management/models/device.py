# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Device(models.Model):
    _name = 'school.device'
    _description = 'Devices Model'
class DeviceCategory(models.Model):
    _name = 'school.device.category'
    _description = 'Device ategory Model'